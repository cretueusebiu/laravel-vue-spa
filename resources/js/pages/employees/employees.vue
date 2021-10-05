<template>
  <div>
    <div class="row">
      <div class="col">
        <router-link :to="{ name : 'employees.add' }" class="btn btn-primary float-end">
          Add Employee
        </router-link>
      </div>
    </div>
    <employee-list />
  </div>
</template>

<script>
import EmployeeList from './employeelist.vue'

export default {
  components: { EmployeeList },
  middleware: 'auth'
}
</script>