<template>
  <div>
    Hello World
  </div>
</template>

<script>
  export default {
    name: 'PageForm',
    props: [
      'supported_locales_json',
      'page_locales_json',
      'locale',
    ],
    data () {
      return {
        loading: false,
        pagesLocales: [],
      }
    },
    computed: {
      supportedLocales () {
        return JSON.parse(this.supported_locales_json)
      },
      page_locales () {
        return JSON.parse(this.page_locales_json)
      },
      pageExist () {
        return this.page.length > 0
      }
    },
    mounted () {
      let pagesOrigin = JSON.parse(this.page_locales_json)
      let page = null
      let context = this
      
      Object.keys(context.supportedLocales).forEach(function(key, supportedLocale) {
        pagesOrigin.forEach((pageOrigin) => {
          if (pageOrigin.lang === key) {
            page = pageOrigin
            return false
          }
        })
        
        context.pagesLocales.push({
          lang: supportedLocale,
          lang_iso: key,
          status: (page === null) ? false : true,
          id: (page === null) ? null : page.id,
          slug: (page === null) ? '' : page.slug,
          title: (page === null) ? '' : page.title,
          description: (page === null) ? '' : page.description,
          layout: (page === null) ? '' : page.layout,
          options: (page === null) ? {} : JSON.parse(page.options),
          seo_title: (page === null) ? '' : page.seo_title,
          seo_description: (page === null) ? '' : page.seo_description,
          seo_keywords: (page === null) ? [] : JSON.parse(page.seo_keywords)
        })
      })
    },
    methods: {}
  }
</script>