import AppForm from '../app-components/Form/AppForm';

Vue.component('office-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                deleted:  false ,
                office_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});