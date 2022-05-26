import AppForm from '../app-components/Form/AppForm';

Vue.component('membro-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                birth_date:  '' ,
                phone:  '' ,
                address:  '' ,
                marital_status:  '' ,
                personality:  '' ,
                description:  '' ,
                isBaptized:  false ,
                isLeader:  false ,
                isPastor:  false ,
                status_id:  '' ,
                spouse_name:  '' ,
                wedding_date:  '' ,
                baptized_date:  '' ,
                discipler:  '' ,
                ministerios:  '',
                cursos:  '',
            }
        }
    }

});