import LoginPage from '@/pages/LoginPage'
import RegisterPage from '@/pages/RegisterPage'
import NotFoundPage from '@/pages/NotFoundPage'
import AuthenticatedBase from '@/pages/authenticated/AuthenicatedBase'
import TodoDashboardPage from '@/pages/authenticated/TodoDashboardPage'
import LogoutPage from '@/pages/authenticated/LogoutPage'

const routes = [
  {
      path: '/',
      redirect: {name: 'login'}
  },
  {
      name: 'login',
      path: '/login',
      component: LoginPage,
  },
  {
      name: 'register',
      path: '/register',
      component: RegisterPage,
  },
  {
      path: '/auth',
      name: 'auth.todo',
      component: AuthenticatedBase,
      meta: {requiresAuth: true},
      children: [
          {
              name: 'auth.todo.dashboard',
              path: 'todo-dashboard',
              component: TodoDashboardPage,
          },
          {
              name: 'logout',
              path: 'logout',
              component: LogoutPage,
          }
      ]
  },
  // Catch-all for unknown pages
  {
      path: '*',
      component: NotFoundPage,
  }
]
export default routes 