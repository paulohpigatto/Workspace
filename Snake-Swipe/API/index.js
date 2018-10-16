const Swipe = require('@swp/swipe-sdk')
const express = require('express');
const app = express();
const cors = require('cors');

app.use(cors());

const low = require('lowdb')
const FileSync = require('lowdb/adapters/FileSync')

const adapter = new FileSync('db.json')
const db = low(adapter)

const conversionWeight = 0.001;

const swp = Swipe.init({
  apiKey: "",
  secret: "",
  sandbox: true
})

app.post('/player/:name', async (req, res) => {
  let nameExists = db.get('accounts')
                      .find({ playerName: req.params.name })
                      .value();

  if(nameExists){
    res.status(200);
    res.send(nameExists);
  } else{
    let newAccount = await swp.createAccount();

    let account = {
      id: newAccount.account.id,
      playerName: req.params.name
    }

    db.get('accounts')
      .push(account)
      .write()

    res.status(200);
    res.send(newAccount.account);
  }
});

app.post('/score/:name', async (req, res) => {
  let coreAccount = db.get('accounts')
                      .find({ playerName: 'core' })
                      .value();

  let playerAccount = db.get('accounts')
                        .find({ playerName: req.params.name })
                        .value();

  let assets = await swp.getAllAssets();

  let payment = {
    from: coreAccount.id,
    to: playerAccount.id,
    asset: assets[0].asset.id,
    amount: parseInt(req.query.amount) * conversionWeight,
  }

  let paymentForDb = {
    from: coreAccount.id,
    to: playerAccount.id,
    asset: assets[0].asset.id,
    score: parseInt(req.query.amount),
    convertedAmount: parseInt(req.query.amount) * conversionWeight
  }

  try{
    db.get('payments')
      .push(paymentForDb)
      .write();

    let madePayment = await swp.makePayment(payment);

    madePayment.payment.operations.forEach(op => {
      console.log(op.amount)
    })
  } catch(e){
    console.log(e);
    res.status(500);
    res.json({
      error: e.error.msg
    })
  }
});

app.get('/balance/:name', (req, res) => {
  let player = db.get('accounts')
                  .find({playerName: req.params.name})
                  .value();

  let payments = db.get('payments')
                    .filter({to: player.id})
                    .value();

  let playerStats = {
    totalScore: 0,
    highScore: 0,
    totalConverted: 0
  }

  for(let payment of payments){
    if(payment.score > playerStats.highScore) playerStats.highScore = payment.score;

    playerStats.totalScore += payment.score;
    playerStats.totalConverted += payment.convertedAmount;
  }
  
  res.status(200);
  res.json({
    stats: playerStats,
    msg: `You're elegible for R$${playerStats.totalConverted}!`
  });
});

app.listen(3000, function () {
  console.log('Listening on port 3000!');
});