-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 11:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odfs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'PHP', 'PHP is an open-source server-side scripting language that many devs use for web development. It is also a general-purpose language that you can use to make lots of projects, including Graphical User Interfaces (GUIs).', 1, 0, '2022-05-16 10:02:41', '2022-05-16 10:02:41'),
(2, 'VB.NET', 'Visual Basic, originally called Visual Basic .NET, is a multi-paradigm, object-oriented programming language, implemented on .NET, Mono, and the .NET Framework. Microsoft launched VB.NET in 2002 as the successor to its original Visual Basic language.', 1, 0, '2022-05-16 10:03:27', '2022-05-16 10:03:27'),
(3, 'Python', 'Python is a high-level, interpreted, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected.', 1, 0, '2022-05-16 10:03:48', '2022-05-16 10:03:48'),
(4, 'JavaScript', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Over 97% of websites use JavaScript on the client side for web page behavior, often incorporating third-party libraries.', 1, 0, '2022-05-16 10:04:11', '2022-05-16 10:04:11'),
(5, 'test', 'test', 1, 1, '2022-05-16 10:04:54', '2022-05-16 10:04:59'),
(6, 'Wellness', 'Wellness and Health Resources provide essential tools, tips, and guidance to help individuals maintain a balanced lifestyle, improve mental and physical well-being, and achieve long-term health goals.', 1, 0, '2022-05-16 10:04:11', '2024-08-16 23:13:35'),
(7, 'Mental Health', 'Mental health refers to a person\'s emotional, psychological, and social well-being. It encompasses how individuals handle stress, relate to others, and make decisions. Good mental health is characterized by a positive state of mind, effective coping mechanisms, and the ability to maintain fulfilling relationships and a balanced life.', 1, 0, '2022-05-16 10:04:11', '2024-08-16 23:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `comment_list`
--

CREATE TABLE `comment_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `post_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_list`
--

INSERT INTO `comment_list` (`id`, `user_id`, `post_id`, `comment`, `date_created`) VALUES
(1, 4, 2, 'Test Comment 123', '2022-05-16 12:05:21'),
(2, 4, 2, '<p>This is a sample comment only</p>', '2022-05-16 13:00:42'),
(4, 4, 3, '<p>test 123</p>', '2022-05-16 13:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `post_list`
--

CREATE TABLE `post_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_list`
--

INSERT INTO `post_list` (`id`, `user_id`, `category_id`, `title`, `content`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 4, 1, 'Sample Topic Title', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla bibendum urna ac eleifend. Quisque in est eu ipsum blandit accumsan ultrices nec tortor. Aliquam lacinia, ex sit amet iaculis sollicitudin, urna odio tempor nulla, eu lacinia augue mi a felis. Quisque finibus in arcu sed ultricies. Duis eleifend metus consectetur vulputate bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut interdum libero vitae nisi finibus, non varius quam volutpat. Cras non iaculis neque. Integer bibendum sagittis dignissim. Ut aliquet suscipit velit sit amet hendrerit. Sed mattis pellentesque augue id bibendum. Phasellus quis justo ornare, faucibus arcu at, ullamcorper lectus.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Nulla a nisl quis tellus volutpat lacinia. Nullam et eros ac mi dapibus ornare. Suspendisse sit amet purus mattis, ullamcorper nulla sit amet, euismod urna. Fusce ac pulvinar velit. Vivamus tellus nibh, pretium eu consectetur et, hendrerit eu elit. Proin et augue ultricies, euismod augue a, varius nibh. Donec condimentum justo erat, non cursus mi pharetra vel. Cras pretium nulla quis justo venenatis, vitae aliquet justo dapibus. Maecenas efficitur viverra tellus, vestibulum pharetra est dictum at. Aenean mauris tellus, luctus vitae odio sit amet, sagittis faucibus nisl. Aliquam in dignissim sapien, nec sagittis lorem. Donec facilisis vulputate purus vitae congue. Nunc eros risus, congue id nisi nec, hendrerit tristique sem. Phasellus sodales nunc arcu, nec ultricies tellus tincidunt et.</p>', 1, 0, '2022-05-16 11:13:02', '2022-05-16 13:57:01'),
(2, 4, 1, 'Topic 2 - Updated', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Quisque et commodo sem, sed aliquam justo. In varius erat purus, sit amet fermentum sapien semper sed. Quisque consequat blandit est eget gravida. Aliquam venenatis, libero eget hendrerit auctor, arcu dui interdum diam, ac hendrerit lacus eros ut sapien. Aenean commodo luctus metus eget vestibulum. Vestibulum nec convallis nulla, porttitor aliquet justo. In quis augue non ligula commodo tempus. Fusce ex ex, blandit sit amet lorem quis, pharetra aliquam leo. Mauris consequat vel mauris vitae consequat. Donec a enim ac erat malesuada varius non eget erat. Aliquam erat volutpat.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Fusce quis nisi at libero sodales pretium. Proin interdum, nisl quis ornare malesuada, nisi erat vestibulum nisi, nec egestas leo orci vel mauris. Ut quis varius orci. Vivamus nec vulputate purus. Sed ut magna euismod, accumsan arcu non, sagittis purus. Ut tempor elit at scelerisque eleifend. Morbi pharetra est in nibh eleifend, nec sagittis orci posuere. In malesuada, libero sit amet rutrum accumsan, quam leo ultricies augue, a maximus leo massa sit amet diam. Nunc dictum orci dui, vitae condimentum ex porta in. Ut sodales posuere mollis. Sed at sem pellentesque ligula commodo blandit. Ut sem velit, vulputate at porttitor vel, rutrum sit amet velit. Nunc ultrices, felis lacinia lobortis pharetra, purus quam porta massa, sed hendrerit arcu mi in magna. In dignissim urna sit amet mi pharetra, eu molestie libero rhoncus. Sed sit amet ipsum accumsan libero ullamcorper egestas.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Aliquam et tincidunt eros. Pellentesque ut luctus leo, nec fermentum velit. Vestibulum a justo et ligula hendrerit laoreet vitae et nunc. Pellentesque commodo dignissim justo, rutrum dictum est euismod vel. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc convallis arcu nec ullamcorper gravida. Phasellus ullamcorper nisi euismod tellus convallis, a aliquet ex commodo. Vivamus cursus elit purus, eu tristique lorem congue nec. Suspendisse tincidunt commodo purus, eget pharetra ipsum.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Morbi cursus tincidunt ex vel elementum. Suspendisse et suscipit quam, vel interdum elit. Nullam mollis massa nisi, id consectetur nibh sodales vel. Pellentesque lobortis dignissim odio, vitae hendrerit dolor sollicitudin sit amet. Suspendisse ut leo id ex interdum ornare eget eu ex. Fusce laoreet erat in leo venenatis scelerisque. Aliquam laoreet sem ipsum, ac euismod justo egestas a. Ut facilisis posuere ante, sit amet tincidunt augue pretium vitae. Curabitur ullamcorper venenatis felis, ac pharetra velit varius vitae. Quisque et dignissim orci. Mauris non felis nec ligula posuere dignissim. Vivamus semper lacinia magna sed mollis. Maecenas a euismod lectus.</p>', 1, 0, '2022-05-16 11:25:21', '2022-05-16 13:56:52'),
(3, 4, 2, 'test', '<p>Data to delete</p>', 1, 1, '2022-05-16 13:52:36', '2022-05-16 13:54:05'),
(4, 1, 1, 'test', '<p>test</p>', 1, 1, '2022-05-16 14:11:24', '2022-05-16 14:12:10'),
(5, 1, 6, 'Mental Health in a Work-From-Home Environment', '<p>In a world where remote work has become the new normal, the boundaries between work and home life can blur, leading to unique challenges for mental health. While working from home offers flexibility, it can also contribute to feelings of isolation, burnout, and stress if not managed properly. Here are five essential tips to maintain mental well-being while working remotely.</p><h3>1. <strong>Establish a Routine and Stick to It</strong></h3><p>Creating a daily routine helps simulate a regular work environment, keeping the mind in \"work mode\" during business hours. A consistent schedule can reduce anxiety and enhance productivity, as noted by the American Psychological Association (APA), structuring throughout your day also helps in managing stress and preventing overwork.</p><h3>2. <strong>Designate a Dedicated Workspace</strong></h3><p>Having a designated workspace, separate from your personal living space, is crucial for mental clarity. The Harvard Business Review emphasizes the importance of creating a physical separation between work and home life, which can improve focus and help employees unplug after work . A clutesk or dedicated home office makes it easier to transition between work and relaxation.</p><h3>3. <strong>Stay Connected to Colleagues</strong></h3><p>One of the downsides of remote work is the lack of social interaction, which can lead to feelings of loneliness and isolation. According to a study by the Journal of Occupational Health Psychology, maintaining regular communication with colleagues via virtual meetings and messaging platforms can improve team cohesion and support mental health . Regular social with co-workers can help mitigate feelings of isolation.</p><h3>4. <strong>Practice Self-Care and Take Breaks</strong></h3><p>It’s easy to get caught up in work when there’s no commute or office to leave behind. However, taking regular breaks is essential for mental well-being. The World Health Organization (WHO) suggests short, frequent breaks to refresh your mind and prevent burnout . Activities like stretching, or meditating during these breaks can help you recharge and improve overall focus.</p><h3>5. <strong>Set Boundaries and Unplug After Work</strong></h3><p>Working from home can blur the lines between professional and personal life, making it harder to \"switch off\" after hours. The Mayo Clinic recommends setting clear boundaries by designating work hours and limiting distractions during personal time . Turning off work notifications ouhese hours can help you prioritize relaxation and ensure you have time to mentally recharge.</p><h3>Conclusion</h3><p>While working from home presents distinct challenges, prioritizing mental health is key to maintaining balance and productivity. By establishing routines, creating boundaries, and practicing self-care, remote workers can foster a healthier, more positive work-life balance. Remember, it’s essential to check in with yourself regularly and make adjustments to safeguard your mental well-being.<br><br>References:</p><ul><li><li>American Psychological Association. (2020). \"Staying Resilient During COVID-19.\" Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://www.apa.org\">APA Website</a>.</li><li>Harvard Business Review. (2020). \"How to Manage Remote Teams.\" Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://hbr.org\">HBR Website</a>.</li><li>Journal of Occupational Health Psychology. (2020). \"Impact of Remote Work on Mental Health.\"</li><li>World Health Organization. (2020). \"Healthy at Home: Mental Health.\" Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://www.who.int\">WHO Website</a>.</li><li>Mayo Clinic. (2021). \"Work-Life Balance: Tips to Reclaim Control.\" Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://www.mayoclinic.org\">Mayo Clinic Website</a>.</li></li></ul>', 1, 0, '2024-08-16 23:11:12', '2024-08-16 23:29:13'),
(6, 1, 6, 'Creating a Healthy Work-Life Balance in a Remote Work Setting', '<p>In the age of remote work, maintaining a healthy work-life balance is more critical than ever. While working from home offers flexibility and convenience, it also blurs the lines between professional and personal life, leading to potential burnout and decreased well-being. Here are some practical tips to help you achieve a balanced and productive remote work environment.</p><h3>1. <strong>Set Clear Boundaries</strong></h3><p>One of the biggest challenges of remote work is defining when your workday begins and ends. Establishing clear boundaries helps prevent work from encroaching on personal time. Create a dedicated workspace that is separate from your living areas. Use this space solely for work to mentally differentiate between work and home life. Set specific working hours and communicate these hours to your colleagues and family.</p><h3>2. <strong>Create a Structured Routine</strong></h3><p>A structured daily routine can enhance productivity and mental well-being. Start your day with a consistent morning ritual, whether it’s a workout, meditation, or a healthy breakfast. Establish a routine that includes regular breaks and a defined end to your workday. Consistency helps reinforce the separation between work and personal time, making it easier to switch off at the end of the day.</p><h3>3. <strong>Utilize Technology Mindfully</strong></h3><p>Remote work often involves constant connectivity, but this can lead to digital burnout. Use technology to your advantage by leveraging productivity tools, setting up \"Do Not Disturb\" times, and managing notifications effectively. Schedule specific times to check emails and messages rather than responding to them continuously throughout the day.</p><h3>4. <strong>Prioritize Self-Care</strong></h3><p>Self-care is crucial for maintaining mental health while working remotely. Incorporate physical activities into your daily routine, such as stretching exercises or short walks. Practice mindfulness techniques like deep breathing or meditation to manage stress. Ensure you’re getting adequate sleep and maintaining a balanced diet. Taking time for yourself improves overall well-being and work performance.</p><h3>5. <strong>Stay Connected</strong></h3><p>Working remotely can sometimes lead to feelings of isolation. Make an effort to stay connected with colleagues through virtual meetings, team chats, and social interactions. Participate in online team-building activities and foster relationships that contribute to a sense of community. Connecting with others helps alleviate loneliness and builds a supportive work environment.</p><h3>6. <strong>Seek Flexibility</strong></h3><p>Flexibility is one of the main advantages of remote work, so take advantage of it. If your workload allows, adjust your schedule to accommodate personal responsibilities or peak productivity times. Openly discuss your needs with your employer and explore options for flexible working hours or adjustments to your work environment.</p><h3>7. <strong>Set Realistic Goals</strong></h3><p>Setting achievable goals helps maintain focus and prevent overwhelm. Break larger tasks into smaller, manageable steps and celebrate your progress. Regularly review your goals and adjust them as needed to stay on track without overloading yourself.</p><h3>Conclusion</h3><p>Achieving a healthy work-life balance while working remotely requires intentional effort and self-awareness. By setting boundaries, creating routines, and prioritizing self-care, you can enhance your productivity and overall well-being. Embrace the flexibility that remote work offers, but remember to maintain a clear distinction between work and personal life to foster a balanced and fulfilling remote work experience.</p><h3>References</h3><ul><li><strong>Harvard Business Review</strong>. (2020). <em>How to Set Boundaries When You Work from Home</em>. Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://hbr.org/2020/03/how-to-set-boundaries-when-you-work-from-home\">Harvard Business Review</a></li><li><strong>American Psychological Association</strong>. (2021). <em>Stress in America: Stress and Current Events</em>. Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://www.apa.org/news/press/releases/stress/2021/report\">APA</a></li><li><strong>Forbes</strong>. (2021). <em>Maintaining Work-Life Balance in a Remote Work Environment</em>. Retrieved from <a rel=\"noopener\" target=\"_new\">Forbes</a></li><li><strong>Psychology Today</strong>. (2020). <em>The Importance of Self-Care When Working from Home</em>. Retrieved from <a rel=\"noopener\" target=\"_new\">Psychology Today</a></li></ul>', 1, 0, '2024-08-16 23:28:22', '2024-08-16 23:29:30'),
(7, 6, 7, 'Managing Anxiety in a Remote Work Environment', '<p>Remote work offers flexibility and convenience, but it can also introduce unique stressors that contribute to anxiety. The absence of a traditional office structure, isolation from colleagues, and blurred boundaries between work and personal life can all exacerbate anxiety levels. Here’s how to manage anxiety effectively while working remotely.</p><h3>1. <strong>Establish a Routine</strong></h3><p>Creating a structured daily routine helps reduce anxiety by providing predictability and a sense of control. Start your day at the same time each morning, and include regular breaks and a defined end to your workday. Incorporate activities you enjoy, such as exercise or reading, into your routine to help balance work demands with personal time.</p><h3>2. <strong>Set Up a Dedicated Workspace</strong></h3><p>Having a dedicated workspace can help create a mental separation between work and home life. Choose a specific area for work that is comfortable and free from distractions. This physical separation helps you mentally switch between work and relaxation modes, reducing the anxiety associated with constant work reminders.</p><h3>3. <strong>Practice Mindfulness and Relaxation Techniques</strong></h3><p>Mindfulness and relaxation techniques can significantly reduce anxiety. Incorporate practices such as deep breathing exercises, meditation, or progressive muscle relaxation into your daily routine. Apps like Headspace and Calm offer guided sessions that can be helpful for managing stress and promoting mental well-being.</p><h3>4. <strong>Stay Connected with Colleagues</strong></h3><p>Social isolation can increase anxiety, so it’s important to stay connected with colleagues. Schedule regular check-ins and virtual meetings to maintain a sense of community. Engage in informal conversations and virtual social events to foster relationships and combat feelings of loneliness.</p><h3>5. <strong>Set Clear Boundaries</strong></h3><p>Establishing clear boundaries between work and personal life is crucial for managing anxiety. Define your working hours and communicate them to your team and family. Avoid checking work emails or messages outside of these hours to maintain a healthy work-life balance.</p><h3>6. <strong>Seek Professional Support</strong></h3><p>If anxiety becomes overwhelming, seeking professional support can be beneficial. Many mental health professionals offer virtual therapy sessions, making it easier to access support from home. Cognitive-behavioral therapy (CBT) and other therapeutic approaches can provide strategies for managing anxiety and improving mental health.</p><h3>7. <strong>Incorporate Physical Activity</strong></h3><p>Regular physical activity is effective in reducing anxiety and improving overall well-being. Incorporate exercises such as walking, jogging, or yoga into your daily routine. Physical activity releases endorphins, which can help alleviate stress and improve your mood.</p><h3>Conclusion</h3><p>Managing anxiety in a remote work environment requires intentional strategies and self-care practices. By establishing a routine, setting boundaries, and seeking support when needed, you can effectively manage anxiety and maintain a healthy work-life balance. Prioritize your mental health and embrace practices that promote well-being in your remote work setting.</p><h3>References</h3><ul><li><strong>American Psychological Association</strong>. (2021). <em>Managing Anxiety in the Workplace</em>. Retrieved from <a rel=\"noopener\" target=\"_new\" href=\"https://www.apa.org/topics/anxiety/workplace\">APA</a></li><li><strong>Mindfulness.org</strong>. (2020). <em>Mindfulness Techniques for Reducing Anxiety</em>. Retrieved from <a rel=\"noopener\" target=\"_new\">Mindfulness.org</a></li><li><strong>Forbes</strong>. (2021). <em>How to Manage Remote Work Stress</em>. Retrieved from <a rel=\"noopener\" target=\"_new\">Forbes</a></li><li><strong>Healthline</strong>. (2022). <em>How Exercise Helps with Anxiety</em>. Retrieved from <a rel=\"noopener\" target=\"_new\">Healthline</a></li></ul>', 1, 0, '2024-08-16 23:36:46', '2024-08-16 23:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Online Discussion Forum Site'),
(6, 'short_name', 'ODFS - PHP'),
(11, 'logo', 'uploads/logo.png?v=1652665183'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1652665183');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `achievements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='2';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`, `achievements`) VALUES
(1, 'Adminstrator', '', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1649834664', NULL, 1, '2021-01-20 14:02:37', '2022-05-16 14:17:49', ''),
(4, 'Mark', 'D', 'Cooper', 'mcooper', 'c7162ff89c647f444fcaa5c635dac8c3', 'uploads/avatars/4.png?v=1652667135', NULL, 2, '2022-05-16 10:12:15', '2022-05-16 13:44:49', ''),
(5, 'John', 'D', 'Smith', 'jsmith', '1254737c076cf867dc53d60a0364f38e', NULL, NULL, 2, '2022-05-16 14:19:03', '2022-05-16 14:19:03', ''),
(6, 'Miranda', 'Lana', 'Priestly', 'mirprinck', '436516b29b49e0354be9e9ddbe7ccdc5', NULL, NULL, 2, '2024-08-16 20:22:23', '2024-08-16 20:22:23', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_list`
--
ALTER TABLE `comment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_list`
--
ALTER TABLE `post_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_list`
--
ALTER TABLE `comment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_list`
--
ALTER TABLE `post_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_list`
--
ALTER TABLE `comment_list`
  ADD CONSTRAINT `post_id_fk_cl` FOREIGN KEY (`post_id`) REFERENCES `post_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk_cl` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post_list`
--
ALTER TABLE `post_list`
  ADD CONSTRAINT `category_id_fk_tl` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk_tl` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
