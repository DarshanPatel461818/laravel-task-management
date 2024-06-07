<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Complete Report',
                'description' => 'Finish the quarterly report for Q2.',
                'priority' => 'High',
                'status' => 'Pending',
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-10',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Code Review',
                'description' => 'Review the code changes in the feature branch.',
                'priority' => 'Medium',
                'status' => 'InProgress',
                'start_date' => '2024-06-03',
                'end_date' => '2024-06-12',
                'assignee' => 'Mahesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Client Meeting',
                'description' => 'Meet with the client to discuss project updates.',
                'priority' => 'High',
                'status' => 'Pending',
                'start_date' => '2024-06-07',
                'end_date' => '2024-06-08',
                'assignee' => 'Suresh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Database Migration',
                'description' => 'Migrate the database to the latest schema.',
                'priority' => 'High',
                'status' => 'Pending',
                'start_date' => '2024-06-04',
                'end_date' => '2024-06-09',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Feature Development',
                'description' => 'Implement new features as per the client requirements.',
                'priority' => 'High',
                'status' => 'InProgress',
                'start_date' => '2024-06-02',
                'end_date' => '2024-06-14',
                'assignee' => 'Mahesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bug Fixing',
                'description' => 'Fix the critical bugs reported by QA team.',
                'priority' => 'High',
                'status' => 'InProgress',
                'start_date' => '2024-06-05',
                'end_date' => '2024-06-11',
                'assignee' => 'Suresh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Documentation Update',
                'description' => 'Update project documentation with latest changes.',
                'priority' => 'Medium',
                'status' => 'Pending',
                'start_date' => '2024-06-03',
                'end_date' => '2024-06-13',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Code Refactoring',
                'description' => 'Refactor the legacy code for better maintainability.',
                'priority' => 'Medium',
                'status' => 'InProgress',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-15',
                'assignee' => 'Mahesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UI Design Enhancement',
                'description' => 'Enhance the user interface based on client feedback.',
                'priority' => 'Low',
                'status' => 'Pending',
                'start_date' => '2024-06-08',
                'end_date' => '2024-06-16',
                'assignee' => 'Suresh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Testing',
                'description' => 'Perform comprehensive testing of the application.',
                'priority' => 'Medium',
                'status' => 'InProgress',
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-20',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Performance Optimization',
                'description' => 'Optimize application performance to reduce load times.',
                'priority' => 'High',
                'status' => 'Pending',
                'start_date' => '2024-06-09',
                'end_date' => '2024-06-17',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Security Audit',
                'description' => 'Conduct a security audit to identify vulnerabilities.',
                'priority' => 'High',
                'status' => 'InProgress',
                'start_date' => '2024-06-10',
                'end_date' => '2024-06-18',
                'assignee' => 'Mahesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Server Maintenance',
                'description' => 'Perform routine maintenance on server infrastructure.',
                'priority' => 'Medium',
                'status' => 'Pending',
                'start_date' => '2024-06-11',
                'end_date' => '2024-06-19',
                'assignee' => 'Suresh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Integration Testing',
                'description' => 'Integrate different modules and perform testing.',
                'priority' => 'High',
                'status' => 'InProgress',
                'start_date' => '2024-06-12',
                'end_date' => '2024-06-20',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Documentation Review',
                'description' => 'Review project documentation for accuracy and completeness.',
                'priority' => 'Medium',
                'status' => 'Pending',
                'start_date' => '2024-06-13',
                'end_date' => '2024-06-21',
                'assignee' => 'Mahesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'User Training',
                'description' => 'Conduct training sessions for end-users on new features.',
                'priority' => 'High',
                'status' => 'InProgress',
                'start_date' => '2024-06-14',
                'end_date' => '2024-06-22',
                'assignee' => 'Suresh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Deployment Planning',
                'description' => 'Plan the deployment strategy for upcoming release.',
                'priority' => 'High',
                'status' => 'Pending',
                'start_date' => '2024-06-15',
                'end_date' => '2024-06-23',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Backup Configuration',
                'description' => 'Configure automated backups for data protection.',
                'priority' => 'Medium',
                'status' => 'InProgress',
                'start_date' => '2024-06-16',
                'end_date' => '2024-06-24',
                'assignee' => 'Mahesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Emergency Response Drill',
                'description' => 'Conduct an emergency response drill to test procedures.',
                'priority' => 'High',
                'status' => 'Pending',
                'start_date' => '2024-06-17',
                'end_date' => '2024-06-25',
                'assignee' => 'Suresh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Client Feedback Analysis',
                'description' => 'Analyze client feedback to identify areas for improvement.',
                'priority' => 'Medium',
                'status' => 'InProgress',
                'start_date' => '2024-06-18',
                'end_date' => '2024-06-26',
                'assignee' => 'Rajesh',
                'image' => 'uploads/task/1717694053.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tasks as $task) {
            $existingTask = DB::table('tasks')->where('title', $task['title'])->first();

            if (!$existingTask) {
                DB::table('tasks')->insert($task);
            }
        }
    }
}