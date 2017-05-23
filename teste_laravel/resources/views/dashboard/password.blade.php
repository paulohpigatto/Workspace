<div class="col-md-12">
  <h3>Alterar senha</h3><br/>

  <form method="post" id="formChangePassword" style="margin:0;padding:0;" action="php/change_password.php">
    <p id="warningChanged"></p>

    <div class="group">
      <input class="used" type="password" name="senhaAntiga" maxlength=20 required pattern=".{6,20}" title="A senha tem entre 6 e 20 caracteres"><span class="highlight"></span><span class="bar"></span>
      <label>Senha antiga</label>
    </div>
    <div class="group">
      <input class="used" type="password" name="senhaNova" maxlength=20 required pattern=".{6,20}"><span class="highlight" title="A senha tem entre 6 e 20 caracteres"></span><span class="bar"></span>
      <label>Nova senha</label>
    </div>
    <div class="group">
      <input class="used" type="password" name="senhaConfirmar" maxlength=20 required pattern=".{6,20}"><span class="highlight" title="A senha tem entre 6 e 20 caracteres"></span><span class="bar"></span>
      <label>Confirmar senha</label>
    </div>
    <input type="submit" id="alterarSenha" style="width:170px;" class="center-block" value="Alterar senha"/>
  </form>
</div>
