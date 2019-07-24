export default function reducer(
  state = {
    user: {}
  },
  action) {
  switch (action.type) {
    case "FETCH_USER_FULFILLED": {
      return { ...state, user: action.payload };
    }
    case "RESET_USER": {
      return { ...state, user: {} };
    }
  }
  return state;
}