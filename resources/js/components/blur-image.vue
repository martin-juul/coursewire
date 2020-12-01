<template>
  <v-img
    :max-height="height"
    :max-width="width"
    :src="imageUrl"
    gradient="true"
  ></v-img>

  <!--<canvas :id="blurHash"></canvas>-->
</template>

<script>
import { decode } from 'blurhash';

export default {
  props: [
    'imageUrl',
    'blurHash',
    'height',
    'width',
  ],
  name: 'BlurImage',

  data() {
    return {
      imageLoaded: false,
    };
  },

  mounted() {
   // this.loadBlurHash();
  },

  methods: {
    onLoaded() {
      console.log('loaded');
      this.imageLoaded = true;
    },

    loadBlurHash() {
      if (this.blurHash) {
        const pixels = decode(this.blurHash, this.width, this.height);
        const canvas = document.getElementById(this.blurHash);
        const ctx = canvas.getContext('2d');
        const imageData = ctx.createImageData(this.width, this.height);
        imageData.data.set(pixels);
        ctx.putImageData(imageData, 0, 0);
      }
    },
  },
};
</script>
