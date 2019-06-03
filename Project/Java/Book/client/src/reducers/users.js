import * as Types from './../constants/ActionType';

var initialState = [];

const users = (state = initialState, action) => {
    switch (action.type) {
        case Types.GET_ALL_USER:
            return [...action.users];
        default: return [...state];
    }
};

export default users;