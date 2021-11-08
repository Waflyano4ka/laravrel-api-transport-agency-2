import AppForm from '../app-components/Form/AppForm';

Vue.component('route-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                arrival_city_id:  '' ,
                deleted:  false ,
                departure_city_id:  '' ,
                distance:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});