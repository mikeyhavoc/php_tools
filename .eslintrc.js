module.exports = {
    "env": {
        "es6": true,
        "browser": true,
        "commonjs": true

    },
    "extends": "eslint:recommended",
    "parserOptions": {
        "sourceType": "module"
    },
    "rules": {
        "space": [
            "error",
            2
        ],
        "linebreak-style": [
            "error",
            "unix"
        ],

        "quotes": [
           [ 2, "single" , { "avoidEscape": true}],
           [ 3 , "backtick", { "avoidEscape" : true}]
          /*eslint-env es6*/


          ],
        "semi": [
            "error",
            "always"
        ],
        "no-unreachable":[ "error",
        ],
        "curly": [ "error"
        ]

    }
};