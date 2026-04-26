<script lang="ts" setup>
import ButtonComp from '../ButtonComp.vue'
import CheckIcon from '../icons/CheckIcon.vue'
import CloseIcon from '../icons/CloseIcon.vue'
import { ref, inject, type Ref } from 'vue'

const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
interface _detail {
  name: string
  checked: boolean
}
interface _spec {
  title: string
  details: _detail[]
}
const specs: _spec[] = [
  {
    title: 'Area',
    details: [
      {
        name: 'Ultra-fast browsing',
        checked: true,
      },
      {
        name: 'Advanced AI insights',
        checked: true,
      },
      {
        name: 'Seamless integration',
        checked: true,
      },
      {
        name: 'Advanced AI insights',
        checked: true,
      },
      {
        name: 'Ultra-fast browsing',
        checked: true,
      },
      {
        name: 'Full UTF-8 support',
        checked: true,
      },
    ],
  },
  {
    title: 'WebSurge',
    details: [
      {
        name: 'Fast browsing',
        checked: true,
      },
      {
        name: 'Basic AI recommendations',
        checked: true,
      },
      {
        name: 'Restricts customization',
        checked: true,
      },
      {
        name: 'Basic AI insights',
        checked: false,
      },
      {
        name: 'Fast browsing',
        checked: true,
      },
      {
        name: 'Potential display errors',
        checked: false,
      },
    ],
  },
  {
    title: 'HyperView',
    details: [
      {
        name: 'Moderate speeds',
        checked: false,
      },
      {
        name: 'No AI assistance',
        checked: false,
      },
      {
        name: 'Steep learning curve',
        checked: false,
      },
      {
        name: 'No AI assistance',
        checked: false,
      },
      {
        name: 'Moderate speeds',
        checked: false,
      },
      {
        name: 'Partial UTF-8 support',
        checked: false,
      },
    ],
  },
]
</script>
<template>
  <div id="spec" class="flex flex-col mt-20 pt-20 border-t border-accent5/20">
    <div class="flex flex-col gap-10 items-center">
      <span class="text-paragraph">Spec</span>
      <h2 class="text-heading1">Why Choose Area?</h2>
      <p class="text-paragraph lg:w-2/3 text-center">
        You need a solution that keeps up. That's why we developed Area. A developer-friendly
        approach to streamline your business
      </p>
      <ButtonComp>Discover More</ButtonComp>
    </div>
    <div class="flex flex-row mt-20 overflow-auto shrink-0">
      <div
        v-for="(value, index_parent) in specs"
        :key="index_parent"
        class="flex flex-col w-full shrink-0 md:max-w-1/3 max-w-1/2"
        :class="
          index_parent == 0
            ? 'outline outline-accent5/20 rounded-2xl shadow-[5px_0_5px_-2px_rgba(0,0,0,0.05)]'
            : ''
        "
      >
        <h3
          class="text-center pt-10 pb-5 text-item-heading border-b border-accent5 text-paragraph"
          :class="index_parent === 0 ? 'text-accent4!' : ''"
        >
          {{ value.title }}
        </h3>
        <div
          class="flex flex-row py-7 px-5 gap-2 text-captions border-b border-accent5/20"
          :class="
            index_parent % 2 !== 0
              ? 'border-r'
              : index_child === value.details.length - 1
                ? 'border-b-0'
                : ''
          "
          v-for="(detail, index_child) in value.details"
          :key="index_child"
        >
          <div>
            <CheckIcon v-if="detail.checked" />
            <CloseIcon v-if="!detail.checked" />
          </div>
          <span>{{ detail.name }}</span>
        </div>
      </div>
    </div>
    <div class="flex gap-10 my-30" :class="viewMode === 'desktop' ? 'flex-wrap' : 'flex-col'">
      <img class="flex shrink object-cover" src="/images/Image-1.png" />
      <div
        class="flex flex-col flex-1 grow min-w-0 border-t border-accent5/20 gap-10 justify-center"
        :class="viewMode !== 'desktop' ? 'my-5 pt-10' : ''"
      >
        <p class="text-heading2">
          “I was skeptical, but Area has completely transformed the way I manage my business. The
          data visualizations are so clear and intuitive, and the platform is so easy to use. I
          can't imagine running my company without it.”
        </p>
        <div
          class="flex gap-2"
          :class="viewMode === 'desktop' ? 'flex-col' : 'flex-row items-center'"
        >
          <span class="text-paragraph text-accent4!">John Smith</span>
          <span class="text-captions">Head of Data</span>
        </div>
      </div>
    </div>
  </div>
</template>
