import AppForm from '../app-components/Form/AppForm';

Vue.component('post-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                deleted:  false ,
                post_name:  '' ,
                
            }
        }
    }

});