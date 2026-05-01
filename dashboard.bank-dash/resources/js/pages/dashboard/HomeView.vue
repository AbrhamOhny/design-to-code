<script lang="ts" setup>
import CreditCard from "../../components/CreditCard.vue";
const name = "Test";
const balance = 1500;
const valid = new Date("2030-12");
const uniqueID = 3778123412341234;
</script>
<template>
    <div class="flex flex-col gap-5">
        <!-- Section 1: Cards & Recent transaction -->
        <div class="flex flex-row w-full gap-5">
            <div class="flex flex-col gap-5 flex-1/2">
                <div class="flex flex-row items-center justify-between text-lg font-semibold">
                    <h1 class="text-lg font-semibold">My Cards</h1>
                    <span>See All</span>
                </div>
                <div class="flex flex-row gap-5">
                    <CreditCard
                        :name="name"
                        :balance="balance"
                        :valid="valid"
                        :uniqueID="uniqueID"
                    />
                    <CreditCard
                        :name="name"
                        :balance="balance"
                        :valid="valid"
                        :uniqueID="uniqueID"
                        :isMain="false"
                    />
                </div>
            </div>
            <div class="flex flex-col gap-5 flex-1">
                <div class="flex flex-row items-center justify-between text-lg font-semibold">
                    <h1>Recent Transaction</h1>
                </div>

                <div class="flex flex-col gap-5 p-5 rounded-2xl bg-background-lighter"></div>
            </div>
        </div>
    </div>
</template>
