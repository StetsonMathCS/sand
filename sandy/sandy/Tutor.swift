//
//  Tutor.swift
//  sandy
//
//  Created by Robert Manalo on 2/12/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit

class Tutor: UITableViewCell {
    //MARK: Properties
    @IBOutlet weak var photoImageView: UIImageView!
    @IBOutlet weak var tutorName: UIView!
    @IBOutlet weak var time: UIView!
    @IBOutlet weak var duration: UIView!
    @IBOutlet weak var location: UIView!
    

    override func awakeFromNib() {
        super.awakeFromNib()
        // Initialization code
    }

    override func setSelected(_ selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)

        // Configure the view for the selected state
    }

}
