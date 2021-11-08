import AppForm from '../app-components/Form/AppForm';

Vue.component('post-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                deleted:  false ,
                post_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});