<div class="container">
    <form action="">
        <div class="datospersonalee">
            <h3>Datos Personales</h3> 
            <hr>
            
            <label>DP1: Sexo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" value="0" checked>
                <label class="form-check-label">Femenino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" value="1">
                <label class="form-check-label">Masculino</label>
            </div><br>
            
            <label>DP2: Fecha de nacimiento</label>
            <div class="row">
                <div class="form-group col-6">
                    <input type="date" class="form-control">
                </div>
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Edad" disabled>
                    <small id="emailHelp" class="form-text text-muted">Será calculada apartir de la fecha de nacimiento.</small>
                </div>
            </div><br>

            <label>DP3: Datos del contacto</label>
            <div class="form-group">
                <label>Domicilio</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="ejemplo@mail.com">
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" class="form-control" placeholder="ejemplo@mail.com">
            </div><br>

            <label>DP4: ¿Cuál es el nivel educativo más alto que posee?</label>
            <div class="row">
                <div class="form-group col-6">
                    <select class="form-control">
                    <option selected disabled>Seleccione nivel educativo</option>
                        <option>No posee</option>
                        <option>Primario</option>
                        <option>Secundario</option>
                        <option>Terciario</option>
                        <option>Universitario</option>
                        <option>Educacion especial</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <select class="form-control">
                    <option selected disabled></option>
                        <option>Incompleto</option>
                        <option>Completo</option> 
                    </select>
                </div>

            </div>
            <label>DP5: Actividad laboral actual</label>
            <label>DP6: Cargo</label>
            <label>DP7: Enfermedades</label>
            <label>DP8: Medicación</label>
            <label>DP9: Suplementos</label>
            <label>DP10: ¿Fuma? ¿O ha fumado?</label>
            <label>DP11: ¿Se encuentra en alguna de las siguientes situaciones?</label>
            <label>DP12: Vive acompañado</label>

            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
        </div>
    </form>
</div>