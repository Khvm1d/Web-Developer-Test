const form = $('#form');
const btnSubmit = $('#submit');
const errorClass = 'error-input-highlight';

jQuery.validator.addMethod("checkdomain", function (value, element) {
    return this.optional(element) || !/^.*\.co$/.test(value);
});

const validate = () => {
    form.validate({
        rules: {
            email: {
                required: true,
                email: true,
                checkdomain: true,
            },
            terms: {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Email address is required",
                email: "Please provide a valid e-mail address",
                checkdomain: "We are not accepting subscriptions from Colombia emails"
            },
            terms: "You must accept the terms and conditions"
        },

        errorPlacement: function (error, element) {
            const name = $(element).attr("name");
            const el = $("#" + name + "_validate");
            error.appendTo(el);
        },

        highlight: function (element) {
            form.find("input[id=" + element.id + "]").addClass(errorClass);
            btnSubmit.prop('disabled', true);
        },

        unhighlight: function (element) {
            form.find("input[id=" + element.id + "]").removeClass(errorClass);
            btnSubmit.prop('disabled', false);
        }
    });
};

btnSubmit.click(validate);