<script setup lang="ts">
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed} from "vue";
import useVuelidate from "@vuelidate/core";
import {helpers, required} from "@vuelidate/validators";

// defineProps<{
//     canResetPassword?: boolean;
//     status?: string;
// }>();
//
// const form = useForm({
//     email: '',
//     password: '',
//     remember: false,
// });
const form = useForm({
  amount_cents :''

});

const rules = computed(() => ({
  amount_cents: {
    required: helpers.withMessage("Name is Required", required)

  },

}));

const v$ = useVuelidate(rules, form);

async function submit ()  {
  if (!(await v$.value.$validate()))
    return;
  return   form.post(route('credit'));

 }
</script>

<template>
    <AuthenticatedLayout>
    <GuestLayout>
        <Head title="Donation" />




        <form @submit.prevent="submit">
            <div>
                <InputLabel for="amount_cents" value="amount " />

                <TextInput
                    id="email"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.amount_cents"
                    required
                    autofocus
                    :aria-invalid="v$.amount_cents.$error"

                 />
              <div v-for="error of v$.amount_cents.$errors" >
                <InputError class="mt-2" :message="error.$message" />

              </div>


            </div>

          <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4">
                    donate
                </PrimaryButton>

            </div>
        </form>
    </GuestLayout>
    </AuthenticatedLayout>
</template>
