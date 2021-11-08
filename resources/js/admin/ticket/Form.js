import AppForm from '../app-components/Form/AppForm';

Vue.component('ticket-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                deleted:  false ,
                passenger_id:  '' ,
                schedule_id:  '' ,
                
            }
        }
    }

});