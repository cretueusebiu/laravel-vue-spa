function page (path) {
  return () => import(`~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },

  { path: '/customers', name: 'customers', component: page('customers/Index.vue') },
  { path: '/customers/add', name: 'customers.add', component: page('customers/CustomerForm.vue') },
  { path: '/customers/edit/:customerId', name: 'customers.edit', component: page('Invoices/InvoicesPreview.vue'), props: true },

  { path: '/employees', name: 'employees', component: page('employees/Index.vue') },
  { path: '/employees/add', name: 'employees.add', component: page('employees/employeeform.vue') },
  { path: '/employees/edit/:employeeId', name: 'employees.edit', component: page('employees/employeeform.vue'), props: true },

  { path: '/items', name: 'items', component: page('items/Index.vue') },
  { path: '/items/add', name: 'items.add', component: page('items/ItemForm.vue') },
  { path: '/items/edit/:itemId', name: 'items.edit', component: page('items/ItemForm.vue'), props: true },

  { path: '/sales', name: 'sales', component: page('sales/index.vue') },
  { path: '/sales/add', name: 'sales.add', component: page('sales/saleform.vue') },
  { path: '/sales/edit/:itemId', name: 'sales.edit', component: page('sales/saleform.vue'), props: true },
  { path: '/sales/view/:invoiceId', name: 'sales.view', component: page('sales/view.vue'), props: true },

  { path: '/suppliers', name: 'suppliers', component: page('suppliers/Suppliers.vue') },
  { path: '/suppliers/add', name: 'suppliers.add', component: page('suppliers/supplierform.vue') },
  { path: '/suppliers/edit/:supplierId', name: 'suppliers.edit', component: page('suppliers/supplierform.vue'), props: true },
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
