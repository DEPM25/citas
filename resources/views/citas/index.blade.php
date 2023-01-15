@extends('layouts.app')

@section('content')
    
<div class="container">
    <div id="calendar"></div>
</div>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="formulario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Agendar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_citas">

                    {!! csrf_field() !!}

                    <div class="mb-3 d-none">
                      <input type="text"
                        class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="documento" class="form-label">Documento de Identidad</label>
                      <input type="text"
                        class="form-control" name="documento" id="documento" aria-describedby="helpId" placeholder="Documento de identidad">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text"
                        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                      <label for="apellido" class="form-label">Apellido</label>
                      <input type="text"
                        class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Apellido">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                      <label for="mascota" class="form-label">Nombre de la mascota</label>
                      <input type="text"
                        class="form-control" name="mascota" id="mascota" aria-describedby="helpId" placeholder="Nombre de la mascota">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                      <label for="fecha" class="form-label">Fecha de la cita</label>
                      <input type="date"
                        class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="Fecha de la cita">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3 d-none">
                      <input type="date"
                        class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                      <label for="hora" class="form-label">Hora de la cita</label>
                      <input type="time"
                        class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="Hora de la cita">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnUpdate">Modificar</button>
                <button type="button" class="btn btn-danger" id="btnDelete">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection