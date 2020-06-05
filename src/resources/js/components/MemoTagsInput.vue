<template>
  <div>
    <input type="hidden" name="tags" :value="tagsJson" />
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      :max-tags="maxTags"
      placeholder="Add Tags(Max:5)"
      :autocomplete-items="filteredItems"
      @tags-changed="newTags => tags = newTags"
    />
  </div>
</template>

<script>
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  components: {
    VueTagsInput
  },
  props: {
    initialTags: {
      type: Array,
      default: []
    },
    "max-tags": {
      type: Number,
      default: 5
    }
  },
  data() {
    return {
      tag: "",
      tags: this.initialTags,
      autocompleteItems: [
        {
          text: "AWS"
        },
        {
          text: "GCP"
        }
      ],
      "max-tags": 5
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
      return JSON.stringify(this.tags);
    }
  }
};
</script>

<style lang="css" scoped>
.vue-tags-input {
  max-width: inherit;
  border-radius: 0.25rem;
}
</style>
<style lang="css">
.vue-tags-input .ti-tag {
  background: transparent;
  border: 1px solid #747373;
  color: #747373;
  margin-right: 4px;
  border-radius: 0.25rem;
  font-size: 13px;
}
</style>