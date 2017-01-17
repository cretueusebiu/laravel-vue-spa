import axios from 'axios'

/**
 * Fetch the current user.
 *
 * @return {Object|undefined}
 */
async function fetchUser () {
  try {
    const { data } = await axios.get('/api/user')
    return data
  } catch (e) {}
}

export default {
  fetchUser
}
