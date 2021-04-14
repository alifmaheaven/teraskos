var define = {
    corectionEmailInput: function(value) {
        var emailValidation = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

        var data = {
            valid : true, 
            messages : 'Looks good!' 
        }

        if (!value) {
            data.messages = 'Field Required'
            data.valid = false
        } else if (!emailValidation.test(value) && value) {
            data.messages = 'invalid Email!'
            data.valid = false
        }

        return data
    },
    corectionEmailInputNotMandatory: function(value) {
        var emailValidation = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

        var data = {
            valid : true, 
            messages : 'Looks good!' 
        }

        if (!emailValidation.test(value) && value) {
            data.messages = 'invalid Email!'
            data.valid = false
        }

        return data
    },
    corectionRequiredInput: function(value) {
       
        var data = {
            valid : true, 
            messages : 'Looks good!' 
        }

        if (value == null || value.length < 1) {
            data.messages = 'Field Required'
            data.valid = false
        }

        return data
    },
    corectionRequiredInputPhone: function(value) {
       
        var data = {
            valid : true, 
            messages : 'Looks good!' 
        }

        if (value == null || value.length < 5) {
            data.messages = 'Field Required'
            data.valid = false
        }

        return data
    },
    corectionIPaddressMandatory: function(value){
        var ipValidation = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/
        var data = {
            valid : true, 
            messages : 'Looks good!' 
        }

        if (value == null || value.length < 1) {
            data.messages = 'Field Required'
            data.valid = false
        } else if (!ipValidation.test(value) && value) {
            data.messages = 'invalid IP Address!'
            data.valid = false
        }   

        return data 
    },
    corectionIPaddressNotMandatory: function(value){
        var ipValidation = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/
        var data = {
            valid : true, 
            messages : 'Looks good!' 
        }

        if (!ipValidation.test(value) && value) {
            data.messages = 'invalid IP Address!'
            data.valid = false
        }   
        
        return data 
    },
    limiterMultipleSelect(e) {
        if(e.length > 6) {
            e.pop()
        }
    },
}

export default define