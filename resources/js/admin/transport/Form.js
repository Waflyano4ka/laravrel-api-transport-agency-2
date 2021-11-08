import AppForm from '../app-components/Form/AppForm';

Vue.component('transport-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                car_number:  '' ,
                deleted:  false ,
                model_id:  '' ,
                total_seats:  false ,
                
            }
        }
    }

});