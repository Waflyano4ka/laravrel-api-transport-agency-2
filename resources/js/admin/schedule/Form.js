import AppForm from '../app-components/Form/AppForm';

Vue.component('schedule-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                confirmed:  false ,
                cost:  '' ,
                date:  '' ,
                deleted:  false ,
                route_id:  '' ,
                time:  '' ,
                transport_id:  '' ,
                
            }
        }
    }

});