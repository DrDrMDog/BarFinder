<template>
    <v-card>
        <v-card-title>
            Login
        </v-card-title>

        <v-form v-model="form.hasErrors" @submit.prevent="submit">
            <v-container>
                <v-row>
                    <v-col>
                        <v-text-field
                            v-model="form.email"
                            label="E-Mail-Adresse"
                            required
                            :error="form.errors.email"
                            :loading="form.processing"
                            :error-messages="form.errors.email"
                        />
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        <v-text-field
                            v-model="form.password"
                            label="Password"
                            required
                            :error="form.errors.password"
                            :loading="form.processing"
                            :error-messages="form.errors.password"
                        />
                    </v-col>
                </v-row>

            </v-container>

            <v-card-actions>
                <v-btn type="submit" block :loading="form.processing">Login</v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>

<script setup lang="ts">

import {useForm} from "@inertiajs/vue3";
import login from "../routes/login";

const form = useForm({
    email: '',
    password: '',
});

function submit() {
    form.post(login.form().url);
}
</script>

<style scoped>

</style>