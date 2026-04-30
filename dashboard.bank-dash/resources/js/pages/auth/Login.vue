<script lang="ts" setup>
import { reactive, ref, type Ref, type Reactive } from "vue";
import { router } from "@inertiajs/vue3";
import axios from "axios";

interface _inModel {
    input: string;
    note: undefined | string;
    msg: undefined | string;
}

const email = reactive<_inModel>({
    input: "",
    note: undefined as string | undefined,
    msg: undefined as string | undefined,
});
const password = reactive<_inModel>({
    input: "",
    note: undefined as string | undefined,
    msg: undefined as string | undefined,
});
const isPasswordFocused = ref(false);
const isPasswordHidden = ref(true);

function toggleHidePassword() {
    isPasswordHidden.value = !isPasswordHidden.value;
}

function handleLogin() {
    axios
        .post("/authenticate", {
            email: email.input,
            password: password.input,
        })
        .then((response) => {
            console.log(response);
            if (response.data?.response == "success") {
                //success
                router.visit("/", {
                    replace: true,
                });
            } else {
                email.note = "error";
                email.msg = "Provided credentials does not matches";
            }
        })
        .catch((error) => {
            console.error(error);
            email.note = "error";
            email.msg = "Something went wrong on our side";
        });
}

function handleChange(_model: _inModel) {
    _model.msg = undefined;
    _model.note = undefined;
}
</script>

<template>
    <div class="flex flex-col w-full h-full justify-center items-center">
        <div
            class="flex flex-col h-fit gap-10 p-5 md:rounded-xl bg-background-lighter w-full sm:w-full md:w-1/2 lg:w-2/4"
        >
            <div class="text-xl select-none font-semibold">Bankdash</div>
            <form @submit.prevent="handleLogin" class="flex flex-col">
                <div class="flex flex-row gap-5 items-center relative mb-10">
                    <label class="flex-1" for="email">Email</label>
                    <input
                        @input="handleChange(email)"
                        :data-note="email.note"
                        class="flex-3 bg-background rounded-lg px-3 py-1"
                        id="email"
                        type="email"
                        v-model="email.input"
                    />
                    <span class="msg">{{ email.msg }}</span>
                </div>
                <div class="flex flex-row gap-5 items-center relative mb-10">
                    <label class="flex-1" for="password">Password</label>
                    <input
                        @input="handleChange(password)"
                        :data-note="password.note"
                        class="flex-3 bg-background rounded-lg px-3 py-1"
                        id="password"
                        :type="isPasswordHidden ? 'password' : 'text'"
                        v-model="password.input"
                        @focusin="
                            () => {
                                isPasswordFocused = true;
                            }
                        "
                        @focusout="
                            () => {
                                isPasswordFocused = false;
                            }
                        "
                    />
                    <span class="msg">{{ password.msg }}</span>
                    <button
                        type="button"
                        class="absolute right-0 bg-background px-3 no-decoration"
                        :class="isPasswordFocused ? 'opacity-0' : 'opacity-100'"
                        @click="toggleHidePassword"
                    >
                        {{ isPasswordHidden ? "Show" : "Hide" }}
                    </button>
                </div>
                <button class="w-full bg-primary py-2 rounded-full font-semibold">Login</button>
            </form>
        </div>
    </div>
</template>
