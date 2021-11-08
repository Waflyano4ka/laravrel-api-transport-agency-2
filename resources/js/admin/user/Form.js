import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                api_token:  '' ,
                birthday:  '' ,
                deleted:  false ,
                dismissed:  false ,
                email:  '' ,
                first_name:  '' ,
                inn:  '' ,
                passport_number:  '' ,
                passport_series:  '' ,
                password:  '' ,
                scan:  '' ,
                second_name:  '' ,
                surname:  '' ,
                
            }
        }
    }

});