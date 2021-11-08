import AppForm from '../app-components/Form/AppForm';

Vue.component('passenger-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                deleted:  false ,
                first_name:  '' ,
                passport_number:  '' ,
                passport_series:  '' ,
                phone:  '' ,
                second_name:  '' ,
                surname:  '' ,
                
            }
        }
    }

});