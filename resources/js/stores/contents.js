import { defineStore } from "pinia";
import { useGeneralStore } from "./general";

export const useContentStore = defineStore("content", {
	id: 1,
  state: () => ({
    contents: [],
    content: {},
        loading: false,
        error: null,
	}),
    getters: {
        getContentsPerAuthor: (state) => {
          return (authorId) => state.contents.filter((content) => content.userId === authorId)
        }
      }, 
      actions: {
        async fetchContents() {
         
          this.contents = []
          this.loading = true
          try {
            this.contents = await fetch(`./api/contents`)
            .then((response) => response.json()) 
          } catch (error) {
            this.error = error
          } finally {
            this.loading = false
          }
        },
       
        async fetchContent(id) {
          this.content = null
          this.loading = true
          try {
            this.content = await fetch(`/contents.index/${id}`)
            .then((response) => response.json())
          } catch (error) {
            this.error = error
          } finally {
            this.loading = false
          }
        },
        persist:true,
      }
    })
