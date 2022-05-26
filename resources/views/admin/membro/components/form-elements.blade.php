<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.membro.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status_id'), 'has-success': fields.status_id && fields.status_id.valid }">
    <label for="status_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.status_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.status_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status_id'), 'form-control-success': fields.status_id && fields.status_id.valid}" id="status_id" name="status_id" placeholder="{{ trans('admin.membro.columns.status_id') }}"> -->
        <multiselect 
            v-model="form.status" 
            :options='{{ $status->toJson() }}'
            placeholder="Seleciono o status" 
            label="name" 
            track-by="id" 
            :multiple="false"
            :searchable="true"
         >
        </multiselect>
        <div v-if="errors.has('status_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ministerios'), 'has-success': fields.ministerios && fields.ministerios.valid }">
    <label for="ministerios" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Ministérios</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
    <multiselect
                v-model="form.ministerios"
                :options="{{ $ministerios->toJson() }}"
                :multiple="true"
                track-by="id"
                label="name"
                tag-placeholder="{{ __('Select ministerios') }}"
                placeholder="{{ __('ministerios') }}">
        </multiselect>
        <div v-if="errors.has('ministerios')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ministerios') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cursos'), 'has-success': fields.cursos && fields.cursos.valid }">
    <label for="cursos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Cursos</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
    <multiselect
                v-model="form.cursos"
                :options="{{ $cursos->toJson() }}"
                :multiple="true"
                track-by="id"
                label="name"
                tag-placeholder="{{ __('Select cursos') }}"
                placeholder="{{ __('cursos') }}">
        </multiselect>
        <div v-if="errors.has('cursos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cursos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birth_date'), 'has-success': fields.birth_date && fields.birth_date.valid }">
    <label for="birth_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.birth_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birth_date" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birth_date'), 'form-control-success': fields.birth_date && fields.birth_date.valid}" id="birth_date" name="birth_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birth_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birth_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.phone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.membro.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.address') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.membro.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('marital_status'), 'has-success': fields.marital_status && fields.marital_status.valid }">
    <label for="marital_status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.marital_status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="marital_status" v-model="form.marital_status">
         <option value="casado">Casado(a)</option>
         <option value="solteiro">Solteiro(a)</option>
         <option value="divorciado">Divorciado(a)</option>
         <option value="viúvo">Viúvo(a)</option>
        </select>
        <div v-if="errors.has('marital_status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('marital_status') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('personality'), 'has-success': fields.personality && fields.personality.valid }">
    <label for="personality" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.personality') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="personality" v-model="form.personality">
         <option value="D">Decidido</option>
         <option value="I">Influenciador</option>
         <option value="S">Seguro</option>
         <option value="C">Cauteloso</option>
        </select>
        <div v-if="errors.has('personality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('personality') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('isBaptized'), 'has-success': fields.isBaptized && fields.isBaptized.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="isBaptized" type="checkbox" v-model="form.isBaptized" v-validate="''" data-vv-name="isBaptized" name="isBaptized_fake_element">
        <label class="form-check-label" for="isBaptized">
            {{ trans('admin.membro.columns.isBaptized') }}
        </label>
        <input type="hidden" name="isBaptized" :value="form.isBaptized">
        <div v-if="errors.has('isBaptized')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('isBaptized') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('isLeader'), 'has-success': fields.isLeader && fields.isLeader.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="isLeader" type="checkbox" v-model="form.isLeader" v-validate="''" data-vv-name="isLeader" name="isLeader_fake_element">
        <label class="form-check-label" for="isLeader">
            {{ trans('admin.membro.columns.isLeader') }}
        </label>
        <input type="hidden" name="isLeader" :value="form.isLeader">
        <div v-if="errors.has('isLeader')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('isLeader') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('isPastor'), 'has-success': fields.isPastor && fields.isPastor.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="isPastor" type="checkbox" v-model="form.isPastor" v-validate="''" data-vv-name="isPastor" name="isPastor_fake_element">
        <label class="form-check-label" for="isPastor">
            {{ trans('admin.membro.columns.isPastor') }}
        </label>
        <input type="hidden" name="isPastor" :value="form.isPastor">
        <div v-if="errors.has('isPastor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('isPastor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('spouse_name'), 'has-success': fields.spouse_name && fields.spouse_name.valid }">
    <label for="spouse_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.spouse_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.spouse_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('spouse_name'), 'form-control-success': fields.spouse_name && fields.spouse_name.valid}" id="spouse_name" name="spouse_name" placeholder="{{ trans('admin.membro.columns.spouse_name') }}">
        <div v-if="errors.has('spouse_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('spouse_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wedding_date'), 'has-success': fields.wedding_date && fields.wedding_date.valid }">
    <label for="wedding_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.wedding_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.wedding_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('wedding_date'), 'form-control-success': fields.wedding_date && fields.wedding_date.valid}" id="wedding_date" name="wedding_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('wedding_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wedding_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('baptized_date'), 'has-success': fields.baptized_date && fields.baptized_date.valid }">
    <label for="baptized_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.baptized_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.baptized_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('baptized_date'), 'form-control-success': fields.baptized_date && fields.baptized_date.valid}" id="baptized_date" name="baptized_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('baptized_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('baptized_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('discipler'), 'has-success': fields.discipler && fields.discipler.valid }">
    <label for="discipler" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.discipler') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.discipler" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('discipler'), 'form-control-success': fields.discipler && fields.discipler.valid}" id="discipler" name="discipler" placeholder="{{ trans('admin.membro.columns.discipler') }}">
        <div v-if="errors.has('discipler')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('discipler') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>