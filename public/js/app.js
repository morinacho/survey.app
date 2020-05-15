$(document).ready(function(){ 
    $("#category-type").change(function(){
        $("#category-type option:selected").each(function() {
            switch($(this).val()){
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                    break;
                case 8:
                    break; 
            }
        });
    });



    var countCategory = 1;

    $('#category-select').change(function(){
        var categoryValue = $(this).val(), 
            categoryName  = $(this).find("option:selected").text();
        addCategory(categoryName,categoryValue); 
        $(this).find("option[value='"+ categoryValue +"']").prop("disabled",true);
    }); 

    function addCategory(categoryName, categoryValue){  
        divQuestion = "Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS";
        divCategory = "<div class='card'>" +
                        "<div class='card-header' id='heading" + countCategory + "'>" +
                            "<h2 class='mb-0'>" +
                                "<button class='btn btn-link' type='button' data-toggle='collapse' data-target='#cat" + countCategory +"'>" + categoryName + "</button>" +
                            "</h2>" +
                        "</div>" +

                       "<div id='cat" + countCategory + "' class='collapse show' data-parent='#accordionCategory'>" +
                            "<div class='card-body'>" + 
                              "<hr><button type='button' class='btn btn-outline-secondary btn-block add-question'>Agregar Pregunta</button>" +
                            "</div>" +
                        "</div>" +
                       "</div> "; 
        
        $('#accordionCategory').append(divCategory);
 
        countCategory++; 
    } 
});

