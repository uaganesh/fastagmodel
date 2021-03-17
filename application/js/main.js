(function($) {
 var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
    });



    form.children("div").steps({
        name:"hello",
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        titleTemplate: '<div class="title" name="submit"><span class="step-number">#index#</span><span class="step-text">#title#</span></div>',
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Final Submit',
            current: ''
        },
       
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
         $('form#signup-form').submit();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {

            return true;
        }
    });


    

    
   
    if (marginSlider != undefined) {
        noUiSlider.create(marginSlider, {
              start: [1100],
              step: 100,
              connect: [true, false],
              tooltips: [true],
              range: {
                  'min': 100,
                  'max': 5000
              },
             
       
        });
      

 
    }
})(jQuery);