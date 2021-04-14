var define = {
    defineInputOnlyPhoneNumber: function(e) {
        var keyCode = e.which;
        var value = e.target.value
            /* 
            48-57 - (0-9)Numbers
            45 - (strip)
            46 - (titik)
            65-90 - (A-Z)
            97-122 - (a-z)
            8 - (backspace)
            32 - (space)
            */
            // Not allow special 
        if (value.length < 12) {
            if (keyCode < 48 || keyCode > 58) {
                e.preventDefault();
            }
        } else {
            e.preventDefault();
        }
    },
    defineInputIPAddress: function(e) {
        var keyCode = e.which;
        var value = e.target.value
            /* 
            48-57 - (0-9)Numbers
            45 - (strip)
            46 - (titik)
            65-90 - (A-Z)
            97-122 - (a-z)
            8 - (backspace)
            32 - (space)
            */
            // Not allow special 
        if (keyCode < 48 || keyCode > 58 && keyCode < 65 || keyCode > 90 && keyCode < 97 || keyCode > 122) {
            if (keyCode != 46 && keyCode != 58) {
                e.preventDefault();
            }
        }
    
    },
    defineInputOnlyTemprature: function(e) {
        var keyCode = e.which;
        var value = e.target.value
            /* 
            48-57 - (0-9)Numbers
            45 - (strip)
            46 - (titik)
            65-90 - (A-Z)
            97-122 - (a-z)
            8 - (backspace)
            32 - (space)
            */
            // Not allow special 
        if (value.length < 5) {
            if (keyCode < 48 || keyCode > 58) {
                if (keyCode != 46) {
                    e.preventDefault();   
                }
            }
        } else {
            e.preventDefault();
        }
    },
    defineInputOnlySizeUniversal: function(e) {
        var keyCode = e.which;
        var value = e.target.value
            /* 
            48-57 - (0-9)Numbers
            45 - (strip)
            46 - (titik)
            65-90 - (A-Z)
            97-122 - (a-z)
            8 - (backspace)
            32 - (space)
            */
            // Not allow special 
        if (value.length < 15) {
            if (keyCode < 48 || keyCode > 58) {
                if (keyCode != 46) {
                    e.preventDefault();   
                }
            }
        } else {
            e.preventDefault();
        }
    },
    defineInputOnlyHundredCaracter: function(e) {
        var keyCode = e.which;
        var value = e.target.value
            /* 
            48-57 - (0-9)Numbers
            45 - (strip)
            46 - (titik)
            65-90 - (A-Z)
            97-122 - (a-z)
            8 - (backspace)
            32 - (space)
            */
            // Not allow special 
        if (value.length < 100) {
           
        } else {
            e.preventDefault();
        }
    }
}

export default define