var Request = {
    querySearch : '',
    /**
     * Trả về url search
     * @return string
     */
    getWindowLocationSerch: function()
    {
        return window.location.search;
    },

    /**
     * lấy query url hiện hành
     * @param string key : tên key cần lấy giá trị
     * @param string separator : '-/:' các kí tự chuyển
     * @return string
     */
    getQuerySearch: function(key, separator)
    {
        let querySearch = encodeURI((this.querySearch == '') ? this.getWindowLocationSerch() : this.querySearch);
        if(key!= undefined && separator != undefined) return Request.convertValueParamUrl(key, separator);

        if (key) return Request.getValueParamUrl(key);

        return querySearch;
    },

    getCurrentPathName : function()
    {
        return window.location.pathname;
    },

    /**
     * Xoá đi một tham số trên url
     * @param  string key       string
     * @param  string sourceURL string
     * @return string
     */
    removeParamFromQueryUrl : function(key, sourceURL)
    {
        if (sourceURL == undefined)
        {
            sourceURL = this.getQuerySearch();
        }

        var rtn = sourceURL.split("?")[0],
            param,
            params_arr = [],
            queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";

        if (queryString !== "")
        {
            params_arr = queryString.split("&");
            for (var i = params_arr.length - 1; i >= 0; i -= 1)
            {
                param = params_arr[i].split("=")[0];
                if (param === key)
                {
                    params_arr.splice(i, 1);
                }
            }

            rtn = (params_arr.length > 0) ? rtn + "?" + params_arr.join("&") : rtn;
        }

        this.querySearch = rtn;

        return this;
    },

    /**
     * Thêm mới một url
     * @param string query
     * @param string param_key
     * @param string param_value
     * @return string
     */
    addAndUpdateParamToQueryUrl : function (query,param_key,param_value)
    {
        //tạo một biểu thức chính quy tìm kiếm với tham số param_key
        var re = new RegExp("([?&])" + param_key + "=[^&#]*", "i");
        //kiểm tra nếu tồn tại thì thay thế chuỗi mới với tham số và giá trị được truyền vào
        if (re.test(query)) {
            query = query.replace(re, '$1' + param_key + "=" + param_value);
        }else {
            //kiem tra dấu ? đã có trong chuỗi query ? . True -> "&" : False -> "?";
            var separator = /\?/.test(query) ? "&" : "?";

            query = query + separator + param_key + "=" + param_value;
        }

        return query;
    },

    /**
     * Set tham số tới url nếu có thì update không thì append
     * @param string paramKey   giá trị truyền vào
     * @param string paramValue giá trị truyền vào
     * @param string searchUrl  giá trị url
     */
    setParam : function(paramKey, paramValue, searchUrl)
    {
        if (searchUrl == undefined) searchUrl  = this.getQuerySearch();

        this.querySearch = (paramKey != undefined && paramValue != undefined)
            ? this.addAndUpdateParamToQueryUrl(searchUrl, paramKey, paramValue)
            : searchUrl;
        return this;
    },

    /**
     * Refresh lại trang
     * @return {[type]} [description]
     */
    runLocation:function()
    {
        window.location = this.getCurrentPathName() + this.getQuerySearch();
    },

    /**
     * Convert url thành một object
     * @return object
     */
    convertUrlToObject : function()
    {
        var vars = {};
        var parts = this.querySearch.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value)
        {
            vars[key] = encodeURI(value);
        });

        return vars;
    },

    /**
     * Lấy giá trị trên tham số url
     * @param  string param
     * @return string;
     */
    getValueParamUrl: function(param)
    {
        if(param != undefined)
        {
            let objectUrlSearch = this.convertUrlToObject();

            if (!objectUrlSearch.hasOwnProperty(param))
            {
                throw new Error('Tham số `' + param  + '` truyền vào không tồn tại trên url ');
            }
            return objectUrlSearch[param];
        }
    },

    /**
     * Chuyển đổi giá trị về môt mảng trên url bởi key truyền vào
     * @param string param
     */
    convertValueParamUrl(param, separator='_')
    {
        if (param == undefined)
        {
            throw new Error('method `convertValueParamUrl` yêu cầu phải có một tham số truyền vào');
        }

        let objectValue = this.getValueParamUrl(param);

        return objectValue.split(/[_,+-]/).join(separator);
    }
}

export default Request;

// Thêm key & value tới url
// Request.setParam('age', '24')
// 	   .setParam('name', 'hungokata')
// 	   .setParam('dream', 'BOSS')
// 	   .removeParamFromQueryUrl('dream')
// 	   .runLocation();
// 	   .getQuerySearch('name');