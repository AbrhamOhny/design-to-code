<script lang="ts" setup>
import CreditCard from "../../components/CreditCard.vue";
import MiniTransactions from "../../components/MiniTransactions.vue";
import WeeklyTransactions from "../../components/WeeklyTransactions.vue";
import ExpensePie from "../../components/ExpensePie.vue";
import QuickTransfer from "../../components/QuickTransfer.vue";
import BalanceHistory from "../../components/BalanceHistory.vue";
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
    <div class="section-container">
        <!-- Section 1: Cards & Recent transaction -->
        <section>
            <div class="flex flex-col flex-5/8 gap-5">
                <div class="flex flex-row items-center justify-between text-lg font-semibold">
                    <h1>My Cards</h1>
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

                <div class="card flex flex-col gap-5 p-6! shrink-0">
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
        </section>
        <!-- Section 2: Weekly Activity & Expense Statistics -->
        <section>
            <div class="flex flex-col gap-5 flex-5/8">
                <h1>Weekly Transactions</h1>
                <WeeklyTransactions
                    class="card"
                    :income="[1, 2, 1, 2, 1, 2, 1]"
                    :expense="[2, 1, 2, 1, 2, 1, 2]"
                />
            </div>
            <div class="flex flex-col gap-5 flex-1/3 max-h-1/2">
                <h1>Expense Statistics</h1>
                <ExpensePie
                    class="card"
                    :investment="20"
                    :entertainment="30"
                    :bill="15"
                    :other="35"
                />
            </div>
        </section>
        <!-- Section 3: Quick Transfer & Balance History -->
        <section>
            <div class="flex flex-col gap-5 flex-1/3 max-h-1/2 overflow-clip">
                <h1>Quick Transfer</h1>
                <QuickTransfer class="card" />
            </div>
            <div class="flex flex-col gap-5 flex-5/8 max-h-1/2 overflow-clip">
                <h1>Balance History</h1>
                <BalanceHistory class="card" :data="[150, 350, 250, 450, 300, 600]" />
            </div>
        </section>
    </div>
</template>
<style lang="css" scoped>
@reference '../../../css/app.css';
section {
    @apply flex flex-col lg:flex-row w-full gap-5 overflow-x-auto;
}
.section-container {
    @apply flex flex-col gap-5;
}
h1 {
    @apply text-lg font-semibold;
}
.card {
    @apply p-5 rounded-2xl bg-background-lighter;
}
</style>
