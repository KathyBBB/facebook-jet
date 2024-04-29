import { defineStore } from 'pinia'

export const useIssueStore = defineStore({
  id: 'issue',
  state: () => ({
    issues: [],
    issue: null,
    loading: false,
    error: null
  }),
  getters: {
    getIssuesPerAuthor: (state) => {
      return (authorId) => state.issues.filter((issue) => issue.userId === authorId)
    }
  }, 
  actions: {
    async fetchIssues() {
      this.issues = []
      this.loading = true
      try {
        this.issues = await fetch('./api/issues')
        .then((response) => response.json()) 
      } catch (error) {
        this.error = error
      } finally {
        this.loading = false
      }
    },
    async fetchIssue(id) {
      this.issue = null
      this.loading = true
      try {
        this.issue = await fetch(`https://jsonplaceholder.typicode.com/issues/${id}`)
        .then((response) => response.json())
      } catch (error) {
        this.error = error
      } finally {
        this.loading = false
      }
    }
  }
})