import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head, useForm, Link } from "@inertiajs/inertia-react";

export default function Dashboard(props) {
    const { data, setData, errors, post } = useForm({
        task: '',
        description: '',
        status: '',
        user: '',
    });
    
    function handleSubmit(e) {
        e.preventDefault()
        post(route('todos.store'))
    }
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Create Todos</h2>}
        >
            <Head title='Todos' />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                href={route('todos.index')}
                            >
                                Go Back
                            </Link>
                        </div>
                        <form
                            name="createForm"
                            onSubmit={handleSubmit}
                        >
                            <div className='flex flex-col'>
                                <div className="mb-4">
                                    <label htmlFor='task'>Task</label>
                                    <input
                                        type="text"
                                        name="task"
                                        value={data.task}
                                        onChange={(e) =>
                                            setData('task', e.target.value)
                                        }
                                    />
                                    <span className="text-red-600">
                                        {errors.task}
                                    </span>
                                </div>
                                <div className="mb-0">
                                    <label htmlFor="description">Description</label>
                                    <textarea
                                        type='text'
                                        className="w-full rounded"
                                        label='description'
                                        name="description"
                                        errors={errors.description}
                                        value={data.description}
                                        onChange={(e) =>
                                            setData("description", e.target.value)}
                                    />

                                    <span className="text-red-600">
                                        {errors.description}
                                    </span>
                                </div>
                                <div className="mb-0">
                                    <label htmlFor="status">Status</label>
                                    <textarea
                                        type='text'
                                        className="w-full rounded"
                                        label='status'
                                        name="status"
                                        errors={errors.status}
                                        value={data.status}
                                        onChange={(e) =>
                                            setData("status", e.target.value)}
                                    />

                                    <span className="text-red-600">
                                        {errors.status}
                                    </span>
                                </div>
                                <div className="mb-0">
                                    <label htmlFor="user">User</label>
                                    <textarea
                                        type='text'
                                        className="w-full rounded"
                                        label='user'
                                        name="user"
                                        errors={errors.user}
                                        value={data.user}
                                        onChange={(e) =>
                                            setData("user", e.target.value)}
                                    />

                                    <span className="text-red-600">
                                        {errors.user}
                                    </span>
                                </div>
                            </div>
                
                            <div className="mt-4">
                                <button
                                    type="submit"
                                    className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </Authenticated>
    )
}
