<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            ['name' => 'Sermon Book 1', 'short' => 'Book 1'],
            ['name' => 'Sermon Book 2', 'short' => 'Book 2'],
            ['name' => 'Sermon Book 3', 'short' => 'Book 3'],
            ['name' => 'Sermon Book 4', 'short' => 'Book 4'],
            ['name' => 'Sermon Book 5', 'short' => 'Book 5'],
            ['name' => 'Staff of Moses 1', 'short' => 'Staff 1'],
            ['name' => 'Staff of Moses 2', 'short' => 'Staff 2']
        ]);

        DB::table('chapters')->insert([
            ['book_id' => 1, 'number' => 1, 'title' => 'The Secret of the Forgiveness of Sins and Christ Ahnsahnghong'],
            ['book_id' => 1, 'number' => 2, 'title' => 'The Savior of Each Age and the New Name'],
            ['book_id' => 1, 'number' => 3, 'title' => 'The Tree of Life and Christ Ahnsahnghong'],
            ['book_id' => 1, 'number' => 4, 'title' => 'Jerusalem Mother'],
            ['book_id' => 1, 'number' => 5, 'title' => 'Heavenly Family and Earthly Family'],
            ['book_id' => 1, 'number' => 6, 'title' => 'Keep the Sabbath Holy'],
            ['book_id' => 1, 'number' => 7, 'title' => 'Passover the Way to Eternal Life'],
            ['book_id' => 1, 'number' => 8, 'title' => 'Cross-Reverence is Idolatry'],
            ['book_id' => 1, 'number' => 9, 'title' => 'Be Baptized Immediately'],
            ['book_id' => 1, 'number' => 10, 'title' => 'The Bible is Fact'],
            ['book_id' => 2, 'number' => 1, 'title' => 'Whom Does the Bible Testify About'],
            ['book_id' => 2, 'number' => 2, 'title' => 'King David and Christ Ahnsahnghong'],
            ['book_id' => 2, 'number' => 3, 'title' => 'God Who Built Zion'],
            ['book_id' => 2, 'number' => 4, 'title' => 'Heavenly Wedding Banquet'],
            ['book_id' => 2, 'number' => 5, 'title' => 'The History of Abraham\'s Family'],
            ['book_id' => 2, 'number' => 6, 'title' => 'The Prophecy of Daniel 2, 7'],
            ['book_id' => 2, 'number' => 7, 'title' => 'The Prophecy of Revelation 13'],
            ['book_id' => 2, 'number' => 8, 'title' => 'The Prophecy of Revelation 17, 18'],
            ['book_id' => 2, 'number' => 9, 'title' => 'The Law of Tithe'],
            ['book_id' => 2, 'number' => 10, 'title' => 'The City of Refuge and the Earth'],
            ['book_id' => 3, 'number' => 1, 'title' => 'Trinity'],
            ['book_id' => 3, 'number' => 2, 'title' => 'About Melchizedek'],
            ['book_id' => 3, 'number' => 3, 'title' => 'Mother, the Source of the Water of Life'],
            ['book_id' => 3, 'number' => 4, 'title' => 'Weeds and Wheat'],
            ['book_id' => 3, 'number' => 5, 'title' => 'The Church Bought with the Blood'],
            ['book_id' => 3, 'number' => 6, 'title' => 'What is the Gospel?'],
            ['book_id' => 3, 'number' => 7, 'title' => 'You Shall Have No Other Gods Before Me'],
            ['book_id' => 3, 'number' => 8, 'title' => 'The Work of God\'s Putting a Seal'],
            ['book_id' => 3, 'number' => 9, 'title' => 'The Book of Life'],
            ['book_id' => 3, 'number' => 10, 'title' => 'The Soul Exists'],
            ['book_id' => 4, 'number' => 1, 'title' => 'The Church Established by the Root of David'],
            ['book_id' => 4, 'number' => 2, 'title' => 'The Last Adam and Christ Ahnsahnghong'],
            ['book_id' => 4, 'number' => 3, 'title' => 'The Bible is a Book of Prophecy'],
            ['book_id' => 4, 'number' => 4, 'title' => 'What Day of the Week is the Biblical Sabbath'],
            ['book_id' => 4, 'number' => 5, 'title' => 'The True Meaning of the Passover'],
            ['book_id' => 4, 'number' => 6, 'title' => 'The Law of Moses and the Law of Christ'],
            ['book_id' => 4, 'number' => 7, 'title' => 'Moses and Jesus (Meaning of the Cross)'],
            ['book_id' => 4, 'number' => 8, 'title' => 'Who Are False Prophets'],
            ['book_id' => 4, 'number' => 9, 'title' => 'Blessings Through Tithes'],
            ['book_id' => 4, 'number' => 10, 'title' => 'About Food'],
            ['book_id' => 5, 'number' => 1, 'title' => 'God\'s Words Are Absolute'],
            ['book_id' => 5, 'number' => 2, 'title' => 'Apart From Me You Can do Nothing'],
            ['book_id' => 5, 'number' => 3, 'title' => 'Commands of God and Rules of Men'],
            ['book_id' => 5, 'number' => 4, 'title' => 'Watch Out for False Prophets'],
            ['book_id' => 5, 'number' => 5, 'title' => 'The Reign of God and the Rign of the Devil'],
            ['book_id' => 5, 'number' => 6, 'title' => 'The Law of Life and the Law of Death'],
            ['book_id' => 5, 'number' => 7, 'title' => 'Jesus\' Second Coming and the Last Judgement'],
            ['book_id' => 5, 'number' => 8, 'title' => 'Coming on the Clouds'],
            ['book_id' => 5, 'number' => 9, 'title' => 'The Lesson From the Fig Tree'],
            ['book_id' => 5, 'number' => 10, 'title' => 'God\'s Coming From the East'],
            ['book_id' => 6, 'number' => 1, 'title' => 'Two Meanings of the Wife of Christ'],
            ['book_id' => 6, 'number' => 2, 'title' => 'False Insistence: The Bride in Rev 22:17 Indicates the Church [Saints]'],
            ['book_id' => 6, 'number' => 3, 'title' => 'False Insistence: The Bride in Rev 19:7 Indicates the Church [Saints]'],
            ['book_id' => 6, 'number' => 4, 'title' => 'False Insistence: The "Us" in Ge 1:26 Refers to the Triune God'],
            ['book_id' => 6, 'number' => 5, 'title' => 'False Insistence: God Cannot Be Two because the Bible Says God Is One'],
            ['book_id' => 6, 'number' => 6, 'title' => 'False Insistence: God Cannot Come as a Man'],
            ['book_id' => 6, 'number' => 7, 'title' => 'False Insistence: Christ Should Perform Miraculous Signs'],
            ['book_id' => 6, 'number' => 8, 'title' => 'False Insistence: They Cannot Believe in God because They Cannot See Him'],
            ['book_id' => 6, 'number' => 9, 'title' => 'False Insistence: The Bible Is Just a Book Written by Men'],
            ['book_id' => 6, 'number' => 10, 'title' => 'False Insistence: We Can Be Saved Only by Faith'],
            ['book_id' => 7, 'number' => 1, 'title' => 'False Insistence: Deeds Have Nothing to Do with Salvation Just as in the Case of the Robber on Jesus\' Right Side'],
            ['book_id' => 7, 'number' => 2, 'title' => 'History of the Abolishment of the Passover of the New Covenant'],
            ['book_id' => 7, 'number' => 3, 'title' => 'Origin of Sunday Service'],
            ['book_id' => 7, 'number' => 4, 'title' => 'False Insistence: Sunday Service is Based on Jesus\' Resurrection and the Holy Spirit\'s Descent'],
            ['book_id' => 7, 'number' => 5, 'title' => 'False Insistence: The Early Church Worshiped and Gave Offerings on Sunday'],
            ['book_id' => 7, 'number' => 6, 'title' => 'False Insistence: The Early Church Kept Sunday as the Lord\'s Day'],
            ['book_id' => 7, 'number' => 7, 'title' => 'False Insistence: The Early Church Had the Holy Supper on Sunday'],
            ['book_id' => 7, 'number' => 8, 'title' => 'False Insistence: The Sabbath and the Feasts Were Abolished (Quoting Hos 2:11)'],
            ['book_id' => 7, 'number' => 9, 'title' => 'False Insistence: The Sabbath and the Feasts Were Abolished (Quoting Col 2:16)'],
            ['book_id' => 7, 'number' => 10, 'title' => 'False Insistence: The Sabbath and the Feasts Were Abolished (Quoting Gal 4:10)']
            
        ]);
    }
}
