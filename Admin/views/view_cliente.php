<div class="row">
                  
  <div class="col-lg-12">
    <div class="p-5">

      <h3>Cadastro de Clientes</h3>

      <form class="user" action="cadastro/cadastro_cliente.php" method="POST">
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="firstname">
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lastname">
          </div>
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
          Cadastrar
        </buton>
      </form>

    </div>
  </div>
</div>