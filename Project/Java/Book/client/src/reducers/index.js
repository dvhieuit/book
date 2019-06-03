import { combineReducers } from 'redux';
import categories from './categories';
import users from './users';
import isDisplayHome from "./isDisplayHome";
import currentUser from "./currentUser";

const appReducers = combineReducers({
	users,
    categories,
    isDisplayHome,
    currentUser
});

export default appReducers;