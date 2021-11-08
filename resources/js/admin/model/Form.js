import AppForm from '../app-components/Form/AppForm';

Vue.component('model-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                deleted:  false ,
                model_name:  '' ,
                
            }
        }
    }

});