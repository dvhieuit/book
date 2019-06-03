import * as Types from './../constants/ActionType';

var initialState = [];

const categories = (state = initialState, action) => {
    switch (action.type) {
        case Types.GET_ALL_CATEGORY:
            return [...action.categories];
        default: return [...state];
    }
};

export default categories;