<script lang="ts" setup>
import CreditCard from "../../components/CreditCard.vue";
import MiniTransactions from "../../components/MiniTransactions.vue";
import WeeklyTransactions from "../../components/WeeklyTransactions.vue";
import ExpensePie from "../../components/ExpensePie.vue";
const name = "Test";
const balance = 1500;
const valid = new Date("2030-12");
const uniqueID = 3778123412341234;
const latestTransactions = [
    {
        amount: 850,
        date: new Date("2021-1-28"),
        sender: "self",
        receiver: "cash",
    },
    {
        amount: 2500,
        date: new Date("2021-1-25"),
        sender: "paypal",
        receiver: "self",
    },
    {
        amount: 5400,
        date: new Date("2021-1-21"),
        sender: "user",
        receiver: "self",
    },
];
</script>
<template>
    <div class="flex flex-col gap-5">
        <!-- Section 1: Cards & Recent transaction -->
        <div class="flex flex-col lg:flex-row w-full gap-5 overflow-x-auto">
            <div class="flex flex-col flex-5/8 gap-5">
                <div class="flex flex-row items-center justify-between text-lg font-semibold">
                    <h1 class="text-lg font-semibold">My Cards</h1>
                    <span>See All</span>
                </div>
                <div class="flex flex-row gap-5 overflow-x-auto">
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
            <div class="flex flex-col flex-1/3 gap-5 shrink-0">
                <div class="flex flex-row items-center justify-between text-lg font-semibold">
                    <h1>Recent Transaction</h1>
                </div>

                <div class="flex flex-col gap-5 p-6 rounded-2xl bg-background-lighter shrink-0">
                    <MiniTransactions
                        v-for="(item, index) in latestTransactions"
                        :key="index"
                        :amount="item.amount"
                        :date="item.date"
                        :sender="item.sender"
                        :receiver="item.receiver"
                    />
                </div>
            </div>
        </div>
        <!-- Section 2: Weekly Activity & Expense Statistics -->
        <div class="flex flex-col lg:flex-row w-full gap-5 overflow-x-auto">
            <div class="flex flex-col gap-5 flex-5/8 overflow-clip">
                <h1 class="text-lg font-semibold">Weekly Transactions</h1>
                <WeeklyTransactions
                    class="p-5 rounded-2xl bg-background-lighter"
                    :income="[1, 2, 1, 2, 1, 2, 1]"
                    :expense="[2, 1, 2, 1, 2, 1, 2]"
                />
            </div>
            <div class="flex flex-col gap-5 flex-1/3 max-h-1/2 overflow-clip">
                <h1 class="text-lg font-semibold">Expense Statistics</h1>
                <ExpensePie
                    class="p-5 rounded-2xl bg-background-lighter"
                    :investment="20"
                    :entertainment="30"
                    :bill="15"
                    :other="35"
                />
            </div>
        </div>
    </div>
</template>
