define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'task/index' + location.search,
                    add_url: 'task/add',
                    edit_url: 'task/edit',
                    del_url: 'task/del',
                    multi_url: 'task/multi',
                    table: 'task',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'weigh',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'category.name', title: __('分类')},
                        // {field: 'category_id', title: __('Category_id')},

                        // {field: 'description', title: __('Description')},
                        {field: 'city', title: __('City')},
                        {field: 'contact', title: __('Contact')},
                        {field: 'phone', title: __('Phone')},
                        // {field: 'company', title: __('Company')},
                        // {field: 'buy_num', title: __('Buy_num')},

                        {field: 'task_num', title: __('Task_num')},
                        // {field: 'buyout', title: __('Buyout'), searchList: {"1":__('Buyout 1'),"0":__('Buyout 0')}, formatter: Table.api.formatter.normal},

                        // {field: 'weigh', title: __('Weigh')},
                        {field: 'read', title: __('Read')},
                        {field: 'already_num', title: __('Already_num')},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"0":__('Status 0')}, formatter: Table.api.formatter.toggle},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {
                            field: 'buttons',
                            width: "120px",
                            title: __('库存管理'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons: [
                                {
                                    name: 'ajax',
                                    text: __('增加购买次数'),
                                    title: __('增加购买次数'),
                                    classname: 'btn btn-xs btn-success btn-magic btn-ajax',
                                    url: 'task/buy_num?already_num={already_num}&task_num={task_num}&price={price}',
                                    confirm: '确认增加吗？',
                                    success: function (data, ret) {
                                        // Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        console.log(data,ret);
                                        setTimeout(function () {
                                            location.reload()
                                        },1500)
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },
                                {
                                    name: 'ajax',
                                    text: __('增加任务数量'),
                                    title: __('增加任务数量'),
                                    classname: 'btn btn-xs btn-danger btn-magic btn-ajax',
                                    url: 'task/task_num?already_num={already_num}&task_num={task_num}&activity_status={activity_status}',
                                    confirm: '确认增加吗？',
                                    success: function (data, ret) {
                                        // Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        // console.log('1111');
                                        // Toastr.success();
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },
                                {
                                    name: 'ajax',
                                    text: __('重发模版消息'),
                                    title: __('重发模版消息'),
                                    classname: 'btn btn-xs btn-danger btn-magic btn-ajax',
                                    url: 'task/sendTemp?city={city}&category_id={category_id}&name={name}&description={description}&id={ids}',
                                    confirm: '确认重发吗？',
                                    success: function (data, ret) {
                                        // Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        // console.log('1111');
                                        Toastr.success(ret.msg);
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        // Layer.alert('发送成功');
                                        Toastr.success('发送成功');
                                        return false;
                                    }
                                },

                            ],
                            formatter: Table.api.formatter.buttons
                        },
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});