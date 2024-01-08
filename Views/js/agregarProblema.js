$(document).ready(function(){
    var contProblema = 2;
    var contDepurada = 2;
    var insumo = 1;
    $("#agregarProblema").click(function() {
        $("#problema").append('<tr><th scope="row">'+contProblema+'</th><td><input type="text" class="form-control" name="problema[]"></td></tr>');
        contProblema++;
    });
    $("#agregarDepurada").click(function() {
        $("#depurada").append('<tr><th scope="row">'+contDepurada+'</th><td><input type="text" class="form-control" name="depurada[]"></td></tr>');
        contDepurada++;
    });
    $("#agregarHospiralario").click(function() {
        $("#hospiralario").append('<tr><td><input type="text" class="form-control" name="principioActivo[]" id="medicamento" autocomplete="off"></td><td><input type="text" class="form-control" name="posologia[]"></td><td><input type="text" class="form-control" name="dosis[]"></td><td><input type="text" class="form-control" name="via[]"></td><td><input type="text" class="form-control" name="frecuencia[]"></td><td><input type="text" class="form-control" name="duracion[]"></td><td><input type="text" class="form-control" name="observacionesHospitalario[]"></td></tr>');       
        contProblema++;
    });
    $("#agregarCasa").click(function() {
        $("#casa").append('<tr><td><input type="text" class="form-control" name="principioActivoCasa[]" id="medicamentoCasa" autocomplete="off"></td><td><input type="text" class="form-control" name="posologiaCasa[]"></td><td><input type="text" class="form-control" name="dosisCasa[]"></td><td><input type="text" class="form-control" name="viaCasa[]"></td><td><input type="text" class="form-control" name="frecuenciaCasa[]"></td><td><input type="text" class="form-control" name="duracionCasa[]"></td><td><input type="text" class="form-control" name="observacionesCasa[]"></td></tr>');       
        contProblema++;
    });
    $("#agregarPDF").click(function() {
        $("#pdf").append('<tr><td>'+contProblema+'</td><td><textarea class="form-control" name="descripcionPdf[]" id="descripcionPdf[]" cols="40" rows="1"></textarea></td><td><input type="file" name="pdfAnexo[]" id="pdfAnexo[]" class="form-control"></td></tr>');       
        contProblema++;
    });
    $("#agregarInsumo").click(function() {
        $("#insumo").append('<tr><td><input type="text" class="form-control" name="principioActivo[]" id="insumoPrincipio" autocomplete="off"></td><td><input type="text" class="form-control" name="dosis[]"></td></tr>');       
        insumo++;
    });
});

