import Vue from 'vue';
import {ValidationObserver, ValidationProvider, extend} from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from './message.json';
import { configure } from 'vee-validate';
configure({
    classes: {
        valid: 'md-valid',
        invalid: 'md-invalid',
        changed: [''],
        touched: [''],
        untouched: [''],
        pristine: [''],
        dirty: [''],
        pending: [''],
        required: [''],
        validated: [''],
        passed: [''],
        failed: ['']
    },
    bails: true,
    skipOptional: true,
    mode: 'aggressive',
    useConstraintAttrs: true
})

Object.keys(rules).forEach(rule => {
    extend(rule, {
        ...rules[rule], // copies rule configuration
        message: messages[rule] // assign message
    });
});

extend('confimedPassword', {
    validate(value, { confirmed }) {
        return confirmed == '' || value == confirmed;
    },
    params: ['confirmed'],
    message: 'Password not match'
});

// disabled space last and begining of word
extend('noMoreSpace', {
    validate(value) {
        var whitespace = /^[^\s]+(\s+[^\s]+)*$/;
        // var whitespace = /^\S((?!.*  ).*\S)?$/;
        return whitespace.test(value);
    },
    message: 'The {_field_} field Not allowed space at begining and last word'
});

// disabled space last and begining of word
extend('disAllowErrorStopercharacter', {
    validate(value) {
        var tester = /[']/;
        // var whitespace = /^\S((?!.*  ).*\S)?$/;
        return !(!!tester.test(value));
    },
    message: 'kolom {_field_} Terdapat karakter terlarang'
});

//disabled dot last word
extend('noDotLastWord', {
    validate(value) {
        var Dot = /^(?![.])(?!.*[-_.]$).+/;
        return Dot.test(value);
    },
    message: 'The {_field_} field Not allowed dot on begining and    last word'
});

//disabled dot last word
extend('multipleselectnomorethan5', {
    validate(value) {
        
        return !(!!value) ? true : value.length > 5 ? false : true;
    },
    message: '{_field_} Tidak boleh lebih dari 5'
});

// validate calender vuetify library
extend('calendarVuetifyValidate', {
    validate(value) {
        var check = !!value[0] && !!value[1];
        return check;
    },
    message: 'Masukan tanggal mulai dan berakhir'
});

// validate time vuetify library
extend('timeVuetifyValidate', {
    validate(value) {
        var check = !!value[0] && !!value[1];
        return check;
    },
    message: 'Masukan waktu mulai dan berakhir'
});

// check is link or not

extend('isValidLink', {
    validate(value) {
        var res = value.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
        return (res !== null)
    },
    message: '{_field_} tidak Valid'
});

extend('isLinkYoutubeOnly', {
    validate(value) {
        var res = value.match(/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/);
        return (res !== null)
    },
    message: '{_field_} hanya diperbolehkan dari youtube'
});

// check article requerd

// myString.replace(/<[^>]*>?/gm, '');
extend('requiredArticle', {
    validate(value) {
        var res = value.replace(/<[^>]*>?/gm, '');
        return !!res;
    },
    message: 'kolom {_field_} wajib di isi'
});

// Register it globally
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver)