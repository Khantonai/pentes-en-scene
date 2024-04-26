<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" id="edit">
            <div class="flex-row">

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <style>
        header h3, header p {
            text-align: center;
        }

        #edit {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        #edit > div:first-child {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        #edit > div:first-child section {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--blue);
            border-radius: 10px;
            height: 100%;
            color: white;
        }

        #edit > div:first-child > div {
            flex: 0 0 calc(50% - 10px);
        }

        #edit > div:first-child .max-w-xl {
            height: 100%;
        }

        #edit > div:last-child {
            flex: 0 0 100%;
            text-align: center;
            background-color: var(--red);
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .mb-6 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
    </style>